<?php

namespace App\Helpers;

use App\Models\Location;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;

trait GoogleMapTrait
{
    public $google_key = 'AIzaSyDi_vwLtn6Te8HoYYsrmvELA2zZC4QIxfM';

    public function distance_between_two_points($request)
    {
        $response_map_matrix = $this->map_matrix($request['lat_a'], $request['lng_a'], $request['lat_b'], $request['lng_b']);
        $mile = $this->meter_to_mile($response_map_matrix['distance_value']);
        $data = [
            'name_from'         => $response_map_matrix['name_from'],
            'name_to'           => $response_map_matrix['name_to'],
            // 'distance_km_text'  => $response_map_matrix['distance_text'],
            // 'distance_km_value' => $response_map_matrix['distance_value'],
            'distance_ml_text'  => $mile . ' mile',
            'distance_ml_value' => $mile,
            // 'duration_text'     => $response_map_matrix['duration_text'],
            // 'duration_value'    => $response_map_matrix['duration_value'],
            'price'             => $this->cost($response_map_matrix['distance_value'], $response_map_matrix['duration_value']),
        ];

        return (object) $data;
    }

    public function map_matrix($lat_from, $lng_from, $lat_to, $lng_to)
    {
        $key = $this->google_key;

        $response = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $lat_from . ',' . $lng_from . '&destinations=' . $lat_to . ',' . $lng_to . '&key=' . $key);

        $response = json_decode($response);
        $result['name_from']          = $response->origin_addresses[0] ?? null;
        $result['name_to']            = $response->destination_addresses[0] ?? null;
        $result['distance_text']      = $response->rows[0]->elements[0]->distance->text ?? null;
        $result['distance_value']     = $response->rows[0]->elements[0]->distance->value ?? null;
        $result['duration_text']      = $response->rows[0]->elements[0]->duration->text ?? null;
        $result['duration_value']     = $response->rows[0]->elements[0]->duration->value ?? null;

        return $result;
    }

    public function cost($distance, $duration)
    {
        $cost = ($distance * env('DELIVERY_COST_DISTANCE')) + ($duration * env('DELIVERY_COST_DURATION'));

        return $cost;
    }

    public function get_location_by_address($address)
    {
        try {
            $key = $this->google_key;

            // https: //maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=YOUR_API_KEY
            $response = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . str_replace(' ', '+', $address) . '&key=' . $key);
            $response = json_decode($response);
            $data = [];
            foreach ($response->results as $key => $value) {
                $data[$key + 1] = (object)[
                    'formatted_address' => $value->formatted_address,
                    'obj' => json_encode($value),
                    // 'lat' => $value->geometry->location->lat,
                    // 'lng' => $value->geometry->location->lng,
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function distance_between_client_auth_to_laundry($location_a, $location_b)
    {
        try {
            $distance = $this->distance_between_two_points([
                'lat_a' => $location_a->lat,
                'lng_a' => $location_a->lng,
                'lat_b' => $location_b->lat,
                'lng_b' => $location_b->lng,
            ]);

            return $distance;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function meter_to_mile($num)
    {
        return round($num * floatval(0.000621371), 1);
    }

    public function get_near_laundries($lat, $long)
    {
        $distance = '500';
        // $distance = config('setting.order.distance_min');
        $chances = config('setting.order.chances');
        $locations = [];

        while (@count($locations) < 0 || $chances > 0) {
            --$chances;

            $locations = Location::select(
                "forable_id",
                "forable_type",
                DB::raw("3963 * acos(cos(radians(" . $lat . "))
                            * cos(radians(locations.lat))
                            * cos(radians(locations.lng) - radians(" . $long . "))
                            + sin(radians(" . $lat . "))
                            * sin(radians(locations.lat))) AS distance")
            )
                ->where('forable_type', 'laundry')
                ->havingRaw("distance < $distance")
                ->get();

            $distance += config('setting.order.distance_step');
        }
        return $locations->pluck('forable_id')->toArray();
    }
}

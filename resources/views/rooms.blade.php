@extends('layouts.app')

@section('title', 'Rooms')
@section('content')
<section class="section-contct-body">
    <div class="container-fluid">
        @livewire('rooms.index')
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="line-bookings row mb-3 px-1 g-3">
                    <span class="col-xl-10 col-lg-8 col-md-12 col-sm-12">
                        <h5 class="card-title">Manage Meeting Rooms</h5>
                        <p class="card-text">Add or Edit Meeting Rooms</p>
                    </span>
                    <span class="col-xl-2 col-lg-4 col-md-12 col-sm-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn text-light fw-bold shadow-sm w-100 h-100 rounded-4"
                            data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #C2203D;">
                            <i class="fa-solid fa-briefcase"></i>
                            New Meeting Room
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog ps-2 d-flex justify-content-end" style="max-width: 75%;">
                                <div class="modal-content rounded-4" style="height: fit-content;">
                                    <div class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white"
                                        style="height: 10rem;">
                                        <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                            Add a New Meeting Room
                                        </h3>
                                        <p class="mb-1 fw-light text-white-50">
                                            New Meeting Room
                                        </p>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" class="w-100 px-2">
                                            <div class="row justify-content-center">
                                                <div class="input-form-login px-1 col-lg-6 col-sm-12">
                                                    <i class="fa-solid fa-circle-user icon fa-lg mt-3"></i>
                                                    <input
                                                        class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                                        placeholder="First Name." type="text">
                                                </div>
                                                <div class="input-form-login px-1 col-lg-6 col-sm-12">
                                                    <i class="fa-solid fa-circle-user icon fa-lg mt-3"></i>
                                                    <input
                                                        class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                                        placeholder="First Name." type="text">
                                                </div>
                                                <div class="input-form-login px-1 col-lg-6 col-sm-12">
                                                    <i class="fa-solid fa-envelope icon fa-lg mt-3"></i>
                                                    <input
                                                        class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                                        placeholder="Type here email" type="email">
                                                </div>
                                                <div class="input-form-login px-1 col-lg-6 col-sm-12">
                                                    <i class="fa-solid fa-lock icon fa-lg mt-3"></i>
                                                    <input
                                                        class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                                        placeholder="Type here password" type="password">
                                                </div>
                                                <div
                                                    class="input-form-login border shadow rounded-4 mx-0 border p-0 col-12">
                                                    <label for="finput1" class="w-100">
                                                        <i class="fa-solid fa-file-export icon fa-lg">
                                                        </i>
                                                        <samp
                                                            class="text-input px-5 py-3 position-absolute text-body-secondary">Upload
                                                            Photos
                                                            here...</samp>
                                                        <input class="form-control py-3 opacity-0" type="file"
                                                            multiple="true" accept="image/*" id="finput1">
                                                    </label>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row m-2 g-2">
                                                        <div class="col-lg-2 col-md-4 col-sm-12">
                                                            <a class="text-white" href="#">
                                                                <div class="image-hover-text-container">
                                                                    <div class="image-hover-image">
                                                                        <img class="img-fluid rounded-5"
                                                                            src="./assets/img/room.png" alt=""
                                                                            srcset="">
                                                                    </div>
                                                                    <div class="image-hover-text">
                                                                        <div class="image-hover-text-bubble rounded-5">
                                                                            <span
                                                                                class="image-hover-text-title d-flex justify-content-center align-items-center h-100">
                                                                                <i
                                                                                    class="fa-regular fa-trash-can fa-lg "></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-2 col-md-4 col-sm-12">
                                                            <a class="text-white" href="#">
                                                                <div class="image-hover-text-container">
                                                                    <div class="image-hover-image">
                                                                        <img class="img-fluid rounded-5"
                                                                            src="./assets/img/room.png" alt=""
                                                                            srcset="">
                                                                    </div>
                                                                    <div class="image-hover-text">
                                                                        <div class="image-hover-text-bubble rounded-5">
                                                                            <span
                                                                                class="image-hover-text-title d-flex justify-content-center align-items-center h-100">
                                                                                <i
                                                                                    class="fa-regular fa-trash-can fa-lg "></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-2 col-md-4 col-sm-12">
                                                            <a class="text-white" href="#">
                                                                <div class="image-hover-text-container">
                                                                    <div class="image-hover-image">
                                                                        <img class="img-fluid rounded-5"
                                                                            src="./assets/img/room.png" alt=""
                                                                            srcset="">
                                                                    </div>
                                                                    <div class="image-hover-text">
                                                                        <div class="image-hover-text-bubble rounded-5">
                                                                            <span
                                                                                class="image-hover-text-title d-flex justify-content-center align-items-center h-100">
                                                                                <i
                                                                                    class="fa-regular fa-trash-can fa-lg "></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                        <div class="col-12">
                                            <div class="row mx-4 my-2 ">
                                                <div class="form-check col-auto d-flex align-items-center">
                                                    <input class="form-check-input shadow-sm" style="padding: 0.7rem;"
                                                        type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label mx-1" for="flexCheckDefault">
                                                        Wifi
                                                    </label>
                                                </div>
                                                <div class="form-check col-auto d-flex align-items-center">
                                                    <input class="form-check-input shadow-sm" style="padding: 0.7rem;"
                                                        type="checkbox" value="" id="flexCheckDefault2">
                                                    <label class="form-check-label mx-1" for="flexCheckDefault2">
                                                        Online Meetings
                                                    </label>
                                                </div>
                                                <div class="form-check col-auto d-flex align-items-center">
                                                    <input class="form-check-input shadow-sm" style="padding: 0.7rem;"
                                                        type="checkbox" value="" id="flexCheckDefault3">
                                                    <label class="form-check-label mx-1" for="flexCheckDefault3">
                                                        Tv
                                                    </label>
                                                </div>
                                                <div class="form-check col-auto d-flex align-items-center">
                                                    <input class="form-check-input shadow-sm" style="padding: 0.7rem;"
                                                        type="checkbox" value="" id="flexCheckDefault4">
                                                    <label class="form-check-label mx-1" for="flexCheckDefault4">
                                                        Projector
                                                    </label>
                                                </div>
                                                <div class="form-check col-auto d-flex align-items-center">
                                                    <input class="form-check-input shadow-sm" style="padding: 0.7rem;"
                                                        type="checkbox" value="" id="flexCheckDefault5">
                                                    <label class="form-check-label mx-1" for="flexCheckDefault5">
                                                        Sound System
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row justify-content-center px-3">
                                        <div class="col-lg-3 col-md-6 col-sm-4 px-1">
                                            <button type="button"
                                                class="btn bg-white py-3 rounded-4 my-3 w-100 shadow fw-bold"
                                                data-bs-dismiss="modal" style="color: #5E1042">
                                                Cancel
                                            </button>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-8 px-1">
                                            <button type="button"
                                                class="btn my-3 w-100 shadow text-white fs-5 rounded-4  fw-bold" style="background: #5E1042;
                                                                      padding-top: 0.8rem;
                                                                      padding-bottom: 0.8rem;">
                                                <i class="fa-solid fa-check fa-fw fa-lg"></i>
                                                Add Now
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
            <div class="col-12 table-responsive-lg">
                <table class="table rounded-4 shadow">
                    <thead class="table-dark rounded-top-4">
                        <tr class="border-white border-opacity-10 text-center">
                            <th class="rounded-top-4 border-1 border-start-0  rounded-end-0 py-3" scope="row">Room
                                ID</th>
                            <th class="py-3 border-1" scope="col">Room Name</th>
                            <th class="py-3 border-1" scope="col">Room Capacity</th>
                            <th class="py-3 border-1" scope="col">Date Added</th>
                            <th class="py-3 border-1" scope="col">Actions</th>
                            <th class="rounded-top-4 rounded-start-0 py-3" scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody class="text-center ">
                        <tr>
                            <td class="align-middle border-1 border-start-0 " scope="row">Room ID</td>
                            <td class="align-middle border-1" scope="col">Room One</td>
                            <td class="align-middle border-1" scope="col">10 Persons</td>
                            <td class="align-middle border-1" scope="col">Floor 01</td>
                            <td class="align-middle border-1" scope="col">25/12/2023</td>
                            <td class="align-middle border-1 border-end-0" scope="col">
                                <button type="button" class="btn fw-bold bg-white m-1 shadow-sm"
                                    style="color: #5E1042;">Delete</button>
                                <button type="button" class="btn text-white fw-bold m-1 shadow-sm"
                                    style="background: #5E1042;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle border-1 border-start-0 " scope="row">Room ID</td>
                            <td class="align-middle border-1" scope="col">Room One</td>
                            <td class="align-middle border-1" scope="col">10 Persons</td>
                            <td class="align-middle border-1" scope="col">Floor 01</td>
                            <td class="align-middle border-1" scope="col">25/12/2023</td>
                            <td class="align-middle border-1 border-end-0" scope="col">
                                <button type="button" class="btn fw-bold bg-white m-1 shadow-sm"
                                    style="color: #5E1042;">Delete</button>
                                <button type="button" class="btn text-white fw-bold m-1 shadow-sm"
                                    style="background: #5E1042;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle border-1 border-start-0 " scope="row">Room ID</td>
                            <td class="align-middle border-1" scope="col">Room One</td>
                            <td class="align-middle border-1" scope="col">10 Persons</td>
                            <td class="align-middle border-1" scope="col">Floor 01</td>
                            <td class="align-middle border-1" scope="col">25/12/2023</td>
                            <td class="align-middle border-1 border-end-0" scope="col">
                                <button type="button" class="btn fw-bold bg-white m-1 shadow-sm"
                                    style="color: #5E1042;">Delete</button>
                                <button type="button" class="btn text-white fw-bold m-1 shadow-sm"
                                    style="background: #5E1042;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle border-1 border-start-0 " scope="row">Room ID</td>
                            <td class="align-middle border-1" scope="col">Room One</td>
                            <td class="align-middle border-1" scope="col">10 Persons</td>
                            <td class="align-middle border-1" scope="col">Floor 01</td>
                            <td class="align-middle border-1" scope="col">25/12/2023</td>
                            <td class="align-middle border-1 border-end-0" scope="col">
                                <button type="button" class="btn fw-bold bg-white m-1 shadow-sm"
                                    style="color: #5E1042;">Delete</button>
                                <button type="button" class="btn text-white fw-bold m-1 shadow-sm"
                                    style="background: #5E1042;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle border-1 border-start-0 " scope="row">Room ID</td>
                            <td class="align-middle border-1" scope="col">Room One</td>
                            <td class="align-middle border-1" scope="col">10 Persons</td>
                            <td class="align-middle border-1" scope="col">Floor 01</td>
                            <td class="align-middle border-1" scope="col">25/12/2023</td>
                            <td class="align-middle border-1 border-end-0" scope="col">
                                <button type="button" class="btn fw-bold bg-white m-1 shadow-sm"
                                    style="color: #5E1042;">Delete</button>
                                <button type="button" class="btn text-white fw-bold m-1 shadow-sm"
                                    style="background: #5E1042;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle border-1 border-start-0 " scope="row">Room ID</td>
                            <td class="align-middle border-1" scope="col">Room One</td>
                            <td class="align-middle border-1" scope="col">10 Persons</td>
                            <td class="align-middle border-1" scope="col">Floor 01</td>
                            <td class="align-middle border-1" scope="col">25/12/2023</td>
                            <td class="align-middle border-1 border-end-0" scope="col">
                                <button type="button" class="btn fw-bold bg-white m-1 shadow-sm"
                                    style="color: #5E1042;">Delete</button>
                                <button type="button" class="btn text-white fw-bold m-1 shadow-sm"
                                    style="background: #5E1042;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <!-- end-line-tebal <..important..> -->
                        <tr class="end-line-tebal">
                            <td class="align-middle border-1 border-bottom-0 border-start-0 rounded-bottom-4 rounded-end-0"
                                scope="col">Room ID</td>
                            <td class="align-middle border-1 border-bottom-0" scope="col">Room One</td>
                            <td class="align-middle border-1 border-bottom-0" scope="col">10 Persons</td>
                            <td class="align-middle border-1 border-bottom-0" scope="col">Floor 01</td>
                            <td class="align-middle border-1 border-bottom-0" scope="col">25/12/2023</td>
                            <td class="align-middle border-1 border-bottom-0 border-end-0 rounded-bottom-4 rounded-start-0"
                                scope="col">
                                <button type="button" class="btn fw-bold bg-white m-1 shadow-sm"
                                    style="color: #5E1042;">Delete</button>
                                <button type="button" class="btn text-white fw-bold m-1 shadow-sm"
                                    style="background: #5E1042;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pe-0 d-none d-lg-flex">
                <img src="assets/img/Frame-end-footer.png" class="img-fluid position-fixed bottom-0 end-0 z-n1"
                    alt="Frame-end-footer">
            </div>
        </div> --}}
    </div>
</section>
@endsection

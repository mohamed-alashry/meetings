<div class="row">
    <div class="col-12">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="line-bookings row mb-3 px-1 g-3">
            <span class="col-xl-10 col-lg-8 col-md-12 col-sm-12">
                <h5 class="card-title">Invitee Managment</h5>
                <p class="card-text">Add or Edit Invitees</p>
            </span>
            <livewire-invitees.create :createModal key='create' />
            @if ($updateModal)
            <livewire-invitees.edit :invitee="$invitee" key='{{ $invitee->id }}' />
            @endif
        </div>
    </div>
    <div class="col-12 table-responsive-lg">
        <table class="table rounded-4 shadow">
            <thead class="table-dark rounded-top-4">
                <tr class="border-white border-opacity-10 text-center">
                    <th class="rounded-top-4 border-1 border-start-0 rounded-end-0 py-3" scope="col">
                        Invitee ID
                    </th>
                    <th class="py-3 border-1" scope="col">Invitee Name</th>
                    <th class="py-3 border-1" scope="col">Invitee Emaill</th>
                    <th class="py-3 border-1" scope="col">Date Added</th>
                    <th class="rounded-top-4 rounded-start-0 py-3" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($invitees as $invitee)
                @if ($loop->last)
                <tr class="end-line-tebal">
                    <td class="align-middle border-1 border-bottom-0 border-start-0 rounded-bottom-4 rounded-end-0"
                        scope="col">
                        {{ $invitee->id }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0" scope="col">
                        {{ $invitee->name }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0" scope="col">
                        {{ $invitee->email }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0" scope="col">
                        {{ $invitee->created_at->format('d M Y') }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0 border-end-0 rounded-bottom-4 rounded-start-0"
                        scope="col">
                        <button type="button" wire:click="deleteInvitee({{ $invitee->id }})"
                            wire:confirm="Are you sure you want to delete this invitees?"
                            class="btn fw-bold bg-white m-1 shadow-sm btn-color-2">
                            Delete
                        </button>
                        <button type="button" class="btn text-white fw-bold m-1 shadow-sm btn-bg-color-2"
                            wire:click="editInvitee({{ $invitee->id }})">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit
                        </button>
                    </td>
                </tr>
                @else
                <tr>
                    <td class="align-middle border-1 border-start-0 " scope="row">
                        {{ $invitee->id }}
                    </td>
                    <td class="align-middle border-1" scope="col">
                        {{ $invitee->name }}
                    </td>
                    <td class="align-middle border-1" scope="col">
                        {{ $invitee->email }}
                    </td>
                    <td class="align-middle border-1" scope="col">
                        {{ $invitee->created_at->format('d M Y') }}
                    </td>
                    <td class="align-middle border-1 border-end-0" scope="col">
                        <button type="button" wire:click="deleteInvitee({{ $invitee->id }})"
                            wire:confirm="Are you sure you want to delete this invitees?"
                            class="btn fw-bold bg-white m-1 shadow-sm btn-color-2">
                            Delete
                        </button>
                        <button type="button" class="btn text-white fw-bold m-1 shadow-sm btn-bg-color-2"
                            wire:click="editInvitee({{ $invitee->id }})">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit
                        </button>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

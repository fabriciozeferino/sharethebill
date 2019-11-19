@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Bills
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                data-target="#createModal">
                            Create
                        </button>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-dark">
                            <thead>
                            <tr class="table-warning">
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Who was there?</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($bills as $bill)

                                <tr>
                                    <th scope="row">{{ $bill->id }}</th>
                                    <td>{{ $bill->type }}</td>
                                    <td>{{ $bill->amount }}</td>
                                    <td>{{ $bill->status }}</td>
                                    <td>{{ $bill->names }}</td>
                                    <td>
                                        <form id="deleteBill{{$bill->id}}"
                                              class="d-inline-block"
                                              action="{{ route('bills.destroy', $bill->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" form="deleteBill{{$bill->id}}"
                                                    class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>

                                        <button type="button" class="btn btn-info btn-sm editModal" data-toggle="modal"
                                                data-target="#editModal" data-id="{{$bill->id}}">
                                            Show
                                        </button>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <button id="btnCloseModal" type="button" class="btn btn-primary btn-lg float-right my-4"
                        data-toggle="modal"
                        data-target="#closeModal">
                    Close the table
                </button>
            </div>
        </div>
    </div>

    @include('bills.create')
    @include('bills.close')

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Show</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@endsection

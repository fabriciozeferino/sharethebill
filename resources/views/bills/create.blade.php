<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createBill" action="{{ route('bills.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="type_id">Type</label>
                        <select id="type_id" class="custom-select" name="type_id">
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->description}}</option>
                            @endforeach
                        </select>
                    </div>

                    <h3 class="mb-0">Who was there?</h3>
                    <hr class="mt-0 mb-1">
                    <table class="table table-hover table-dark table-sm">
                        <thead>
                        <tr class="table-active">
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Spend</th>
                            <th scope="col">Paid</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="align-middle text-center">

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input userOnEvent"
                                               data-checkbox="{{$user->id}}"
                                               id="userCheck{{$user->id}}"
                                        >
                                        <label class="custom-control-label" for="userCheck{{$user->id}}"></label>
                                    </div>

                                </td>
                                <td class="align-middle">{{$user->name}}</td>
                                <td class="align-middle">
                                    <div class="input-group-sm text-right">
                                        <input type="number" min="0.00" step="0.01" value="0"
                                               id="amountInput{{$user->id}}"
                                               class="form-control amountInput" placeholder="0.00"
                                               name="amount[{{ $user->id }}][spend]"
                                               disabled>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="input-group-sm text-right">
                                        <input type="number" min="0.00" step="0.01" value="0"
                                               id="paidInput{{$user->id}}"
                                               class="form-control paidInput" placeholder="0.00"
                                               name="amount[{{ $user->id }}][paid]"
                                               disabled>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="bg-danger">
                            <td class="align-middle text-right" colspan="2"><h4 class="mb-0">Total</h4></td>
                            <td class="align-middle">
                                <div class="input-group-sm">
                                    <input type="number" value="0.00" disabled id="amountTotalInput"
                                           class="form-control" placeholder="Amount">
                                </div>
                            </td>
                            <td>
                                <div class="input-group-sm">
                                    <input type="number" value="0.00" disabled id="paidTotalInput"
                                           class="form-control" placeholder="Paid">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <small id="errorCreate" class="text-danger float-right"></small>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="createBillBtn" type="submit" form="createBill" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

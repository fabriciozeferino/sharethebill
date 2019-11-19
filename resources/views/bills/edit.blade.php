<!-- Modal -->


<form id="editBill" action="" method="post">
    @csrf
    @method('PUT')

    <input type="hidden" value="{{$bill->id}}" name="bill_id">

    <div class="form-group">
        <label for="type_id">Type</label>
        <select id="type_id" class="custom-select" name="type_id">
            <option value="{{$type->id}}">{{$type->description}}</option>
            {{--@foreach($types as $type)
                <option value="{{$type->id}}"  selected @endif>{{$type->description}}</option>
            @endforeach--}}
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
                               @if($user->pivot->spend > 0 || $user->pivot->paid > 0) checked @endif
                        >
                        <label class="custom-control-label" for="userCheck{{$user->id}}"></label>
                    </div>

                </td>
                <td class="align-middle">{{$user->name}}</td>
                <td class="align-middle">
                    <div class="input-group-sm text-right">
                        <input type="number" min="0.00" step="0.01" value="{{$user->pivot->spend}}"
                               id="amountInput{{$user->id}}"
                               class="form-control spendEditInput" placeholder="0.00"
                               name="amount[{{ $user->id }}][spend]"
                               disabled>
                    </div>
                </td>
                <td class="align-middle">
                    <div class="input-group-sm text-right">
                        <input type="number" min="0.00" step="0.01" value="{{$user->pivot->paid}}"
                               id="paidInput{{$user->id}}"
                               class="form-control paidEditInput" placeholder="0.00"
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
                    <input type="number" value="0.00" disabled id="spendEditTotalInput"
                           class="form-control" placeholder="Amount">
                </div>
            </td>
            <td>
                <div class="input-group-sm">
                    <input type="number" value="0.00" disabled id="paidEditTotalInput"
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



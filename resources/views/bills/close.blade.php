<!-- Modal -->
<div class="modal fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="closeModalLabel"
     aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="closeModalLabel">Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table table-active" id="billTable">
                    <tr class="table-success">
                        <th scope="row">User</th>
                        <td>Spend</td>
                        <td>Paid</td>
                        <td>Total</td>
                    </tr>
                </table>


                <form id="closeBill" action="{{ route('bills.close') }}" method="post">
                    @csrf

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="closeBill" class="btn btn-primary">Finish</button>
            </div>
        </div>
    </div>
</div>

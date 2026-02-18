<div class="modal fade" id="viewPayslipsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">💰 My Payslips</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Name:</strong><br>
                                <?= htmlspecialchars($employee['name']) ?>
                            </div>
                            <div class="col-md-4">
                                <strong>Employee ID:</strong><br>
                                <?= htmlspecialchars($employee['employee_id']) ?>
                            </div>
                            <div class="col-md-4">
                                <strong>Position:</strong><br>
                                <?= htmlspecialchars($employee['position']) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h6 class="mb-0">Payslip History</h6>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Pay Period</th>
                                    <th>Gross Pay</th>
                                    <th>Deductions</th>
                                    <th>Net Pay</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>January 2026</td>
                                    <td>₱35,000</td>
                                    <td>₱5,200</td>
                                    <td><strong>₱29,800</strong></td>
                                    <td><span class="badge bg-success">Released</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-secondary">Download</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>December 2025</td>
                                    <td>₱35,000</td>
                                    <td>₱5,100</td>
                                    <td><strong>₱29,900</strong></td>
                                    <td><span class="badge bg-success">Released</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-secondary">Download</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>November 2025</td>
                                    <td>₱35,000</td>
                                    <td>₱5,000</td>
                                    <td><strong>₱30,000</strong></td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" disabled>View</button>
                                        <button class="btn btn-sm btn-outline-secondary" disabled>Download</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="alert alert-info mt-3 small mb-0">
                    📌 Payslips are generated monthly by the HR department.
                    If you find discrepancies, please contact HR.
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

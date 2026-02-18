<div class="modal fade" id="requestLeaveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">📝 Request Leave</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="index.php?url=employee-leave-request" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted mb-3">Employee Information</h6>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control"
                                           value="<?= htmlspecialchars($employee['name']) ?>" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee ID</label>
                                    <input type="text" class="form-control"
                                           value="<?= htmlspecialchars($employee['employee_id']) ?>" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Department</label>
                                    <input type="text" class="form-control"
                                           value="<?= htmlspecialchars($employee['department']) ?>" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Position</label>
                                    <input type="text" class="form-control"
                                           value="<?= htmlspecialchars($employee['position']) ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted mb-3">Leave Details</h6>

                            <div class="mb-3">
                                <label class="form-label">Leave Type</label>
                                <select name="leave_type" class="form-select" required>
                                    <option value="">Select Leave Type</option>
                                    <option value="Sick Leave">Sick Leave</option>
                                    <option value="Vacation Leave">Vacation Leave</option>
                                    <option value="Emergency Leave">Emergency Leave</option>
                                    <option value="Maternity Leave">Maternity Leave</option>
                                    <option value="Paternity Leave">Paternity Leave</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">End Date</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Reason for Leave</label>
                                <textarea name="reason" class="form-control" rows="4"
                                          placeholder="Briefly explain your reason for requesting leave..."
                                          required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Supporting Document (optional)</label>
                                <input type="file" name="attachment" class="form-control">
                                <small class="text-muted">Medical certificate or letter (PDF/JPG)</small>
                            </div>

                            <div class="alert alert-info small mb-0">
                                ⏳ Leave requests are subject to approval by HR or Department Head.
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Submit Leave Request
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

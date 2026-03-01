<div class="modal fade" id="editRequestTypeModal<?= $type['id']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="index.php?url=admin-request-types-update">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Request Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $type['id'] ?>">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($type['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"><?= htmlspecialchars($type['description']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Icon (CSS Class)</label>
                        <input type="text" name="icon" class="form-control" value="<?= htmlspecialchars($type['icon']) ?>">
                    </div>

                    <div class="mb-3">
                        <label>Requires Attachment</label>
                        <select name="requires_attachment" class="form-select">
                            <option value="1" <?= $type['requires_attachment'] ? 'selected' : '' ?>>Yes</option>
                            <option value="0" <?= !$type['requires_attachment'] ? 'selected' : '' ?>>No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-select">
                            <option value="1" <?= $type['is_active'] ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?= !$type['is_active'] ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
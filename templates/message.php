<?php if(isset($_SESSION['message_text']) && isset($_SESSION['message_type'])): ?>
    <?php if($_SESSION['message_type'] == 'success'): ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['message_text']; ?>
        </div>
    <?php endif; ?>

    <?php if($_SESSION['message_type'] == 'error'): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['message_text']; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php
unset($_SESSION['message_type']);
unset($_SESSION['message_text']);
?>
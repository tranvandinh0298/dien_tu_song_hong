<?php
if ($this->session->has_userdata('alert')) {
    $flashMessage = json_decode($this->session->flashdata('alert'), TRUE);
    if (!empty($flashMessage['message'])) {
?>
        <script>
            show_toast_alert({
                'type': '<?= $flashMessage['type'] ?>',
                'message': '<?= trim($flashMessage['message']); ?>',
            });
        </script>
<?php
    }
    unset($flashMessage);
    unset($_SESSION['alert']);
}
?>
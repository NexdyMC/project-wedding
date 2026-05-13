<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($status)) : ?>

<script>

<?php if ($status == "success") : ?>

    Swal.fire({
        title: 'Update Successful!',
        text: 'Guest data has been updated successfully.',
        icon: 'success',

        background: '#FFF6F8',
        color: '#5f4b53',

        confirmButtonColor: '#ff6b9a',

        confirmButtonText: 'Done',

        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },

        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }

    }).then(() => {

        // redirect setelah update
        window.location.href = 'dashboard.php';

    });


<?php elseif ($status == "empty") : ?>

    Swal.fire({
        title: 'Incomplete Form!',
        text: 'Please fill in all required fields.',
        icon: 'warning',

        background: '#FFF6F8',
        color: '#5f4b53',

        confirmButtonColor: '#ff6b9a',

        confirmButtonText: 'Okay'

    });


<?php else : ?>

    Swal.fire({
        title: 'Update Failed!',
        text: 'An error occurred while updating data.',
        icon: 'error',

        background: '#FFF6F8',
        color: '#5f4b53',

        confirmButtonColor: '#ff4d8d',

        confirmButtonText: 'Try Again'

    });

<?php endif; ?>

</script>

<?php endif; ?>
<?php
    if(isset($_SESSION['message'])){
        switch ($_SESSION['message_type']) {
            case 'Success':
?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?="<strong>".$_SESSION['message']."</strong>"?>
<?php
                break;
            case 'Advice':
?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?="<strong>".$_SESSION['message']."</strong>"?>
<?php
                break;
            case 'Failed':
?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?="<strong>".$_SESSION['message']."</strong>"?>
<?php
                break;
            default:
?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?="<strong>".$_SESSION['message']."</strong>"?>
<?php
                
?>

<?php
                break;
        }
    
?>

        <button type="button" class="btn-close" onClick="<?php session_destroy() ?>" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php 
    } 
?>
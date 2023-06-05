<div class="left">
    <a class="profile" style="">
        <div class="profile-photo">
            <?php
            echo " <img src='data:image/" . $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>";
            ?>
        </div>
        <div class="handle">
            <h4 style="color: var(--color-primary);">
                <?php echo $first_name . " " . $surname ?>
            </h4>
            <p class="text-muted">
                <?php echo "@" . $username ?>
            </p>
        </div>
    </a>
    <!----------SIDEBAR----------- -->
    <?php
        include_once "pages/sidebar.php";
        include_once "pages/buttonPrintPostAndPopup.php"
    ?>
</div>
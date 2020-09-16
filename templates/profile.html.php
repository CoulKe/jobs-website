<section class="sub-menu">
    <ul>
        <?= $position === 'candidate' ? '<li><a href="#rate">Rate</a></li>' : '' ?>
        <li><a href="#about">About</a></li>
        <?= $position === 'candidate' ? '<li><a href="#skills">Skills</a></li>' : '' ?>
        <li><a href="#contact">Contact</a></li>
    </ul>
</section>

<div class="profile">
    <div class="profile-center">
        <img src="..<?= $user['profile_pic'] ?? '/assets/user_images/default.png' ?>" alt=<?= "$username" ?> class="profile_pic"> <br>
        <p class="profile_name"><?= $first_name ?? '' ?></p>
        <?php
        if (trim($user['profile_pic'], '') === '') {
            include __DIR__ . '../../templates/profile_pic.html.php';
            echo '<a href="file_upload.php" id="add-pic-link">Add profile picture</a> <br/>';
        }
        //To be added later
        // else {
        //     echo '<a href="file_upload.php">Change profile picture</a> <br/>';
        // }
        ?>
        <a href="profile_details.php">edit details</a>
    </div>
    <div class="details_section container">

        <?php if ($position === 'candidate') : ?>
            <?= "<h1 id='rate'>Rate</h1>"; ?>
            <p><?= $rate === "" ? $unlisted : "USD $rate per hour" ?></p>
        <?php endif; ?>

        <h1 id="about">About</h1>
        <p class="profile_bio"><?= $about === '' ? $unlisted : $about ?></p>


        <?php if ($position === 'candidate') : ?>
            <?= "<h1 id='skills'>Skills</h1>"; ?>
            <p><?= $skills === '' ? $unlisted : $skills ?></p>
        <?php endif; ?>
        <h1 id="contact">Contact</h1>
        <p>Email: <a href="mailto:<?= $email === '' ? $unlisted : $email ?>">thatcoul@gmail.com</a> </p>

        <form method="POST" class="testimonial_form">
            <legend>Testimonial form</legend>
            <label for="Testimonial">Testimonial:</label> <br>
            <textarea name="testimonial" cols="30" rows="10"></textarea> <br>
            <input type="submit" value="Share testimonial">
        </form>

        <?php
        switch (strtolower($position)) {
            case 'employer':

                echo '<form method="POST" class="job_post_form">
            <legend>Fill this to post job</legend>
            <label for="Skills required">Skills required:
                <span>(Separate them with commas)</span></label> <br>
            <input type="text" name="skills_required"> <br>
            <label for="Job description">Job description:</label> <br>
            <textarea name="job_description" cols="30" rows="10"></textarea> <br>
            <input type="submit" value="Post job">';
                break;

            default:
                // echo '';
                break;
        }
        ?>
    </div>
</div>

<style>
    #upload-profile {
        display: none;
    }
</style>
<script>
    let picLink = document.querySelector('#add-pic-link');
    let form = document.querySelector('form');
    let file = document.querySelector('#submit');
    let outputDiv = document.querySelector('.output');
    file.addEventListener('click', sendImage);

    picLink.addEventListener('click', function(e) {
        e.preventDefault();
        picLink.style = 'display: none';
        form.style = 'display: block';

    });

    function sendImage(e) {
        let data = new FormData(form);
        picLink.style = 'display: block';
        form.style = 'display: none';
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'file.php');
        xhr.onload = function() {
            outputDiv.innerHTML = this.responseText
            xhr = '';
        }
        xhr.send(data);
    }
</script>
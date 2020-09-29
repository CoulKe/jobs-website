<section class="sub-menu">
    <ul>
        <?= $position === 'candidate' ? '<li><a href="#rate">Rate</a></li>' : '' ?>
        <li><a href="#about">About</a></li>
        <?= $position === 'candidate' ? '<li><a href="#skills">Skills</a></li>' : '' ?>
        <li><a href="#contact">Contact</a></li>

        <?php if ($displayForm){
            echo $position === 'employer' ? '<li><a href="#post_job">Post job</a></li>' : '';
        }
        ?>
        <?php echo ($displayForm) ? '<li><a href="#testify">Testify</a></li>' : ''; ?>
    </ul>
    </ul>
</section>

<div class="profile">
    <div class="profile-center">
        <img src="..<?= $user['profile_pic'] ?? '/assets/user_images/default.png' ?>" alt=<?= "$username" ?> class="profile_pic"> <br>
        <p class="profile_name"><?= $first_name ?? '' ?></p>
        <?php
        if ($displayForm) {
            if (trim($user['profile_pic'], '') === '') {
                include __DIR__ . '../../templates/profile_pic.html.php';
                echo '<a href="file_upload.php" id="add-pic-link">Add profile picture</a> <br/>';
            }
            echo '<a href="profile_details.php">edit details</a>';
        }
        //To be added later
        // else {
        //     echo '<a href="file_upload.php">Change profile picture</a> <br/>';
        // }
        
        ?>
        
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


        <?php if ($displayForm) {
            echo '<form method="POST" id="testify" class="testimonial_form">
                <legend>Testimonial form</legend>
                <label for="Testimonial">Testimonial:</label> <br>
                <textarea name="testimonial" cols="30" rows="10"></textarea> <br>
                <input type="submit" value="Share testimonial">
            </form>';

            switch (strtolower($position)) {
                case 'employer':

                    echo '<form method="POST" id="post_job" class="job_post_form">
            <legend>Fill this to post job</legend>
            <label for="Company name">Company name:</label> <br>
            <input type="text" name="company_name"> <br>
            <label for="Skills required">Skills required:
                <span>(Separate them with commas)</span></label> <br>
            <input type="text" name="skills_required"> <br>
            <label for="Job description">Job description:</label> <br>
            <textarea name="job_description" cols="30" rows="10"></textarea> <br>
            <input type="submit" name="post_job" value="Post job">';
                    break;
            }
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
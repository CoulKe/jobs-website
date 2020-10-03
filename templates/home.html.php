<div id="header">
    <div id="header-wrapper">
        <h1 id="banner-intro">Your dream job awaits you</h1>
        <p id="slogan">just one click away</p>
        <form action="jobs" method="get">
            <input type="search" name="keyword" placeholder="Type keyword">
            <input type="submit" value="Search">
        </form>

    </div>
</div>

<div class="container">
    <section id="latest_section">
        <h1 class="title">Latest jobs</h1>

        <div class="jobs">
            <?php foreach ($jobs_array as $jobs) : ?>
                <div class="latest_job">
                    <div class="image"></div>
                    <div class="company_title">Company: <a href=<?="profile?username=".$jobs['username'];?>>
                    <?= $jobs['company'] ?></a></div>
                    <div class="job_description">
                        Description:<br /> <?= $jobs['description'] ?>.
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="jobs" class="see_more">Browse more jobs</a>
    </section>
    <section id="post_or_join">
        <div id="post_job">
            <h1>Post a job</h1>
            <a href="profile#post_job" id="post_link">Click here to post job</a>
        </div>
        <div id="create_account">
            <?php
            if(!$logged_in){
                echo '<h1>Create account</h1>
            <a href="register" id="create_link">Click here to create account</a>';
        } 
        else{
            echo '<h1>You are logged in</h1>
            <a href="register" id="create_link">Click here to see profile</a>';
        }
        ?>
        </div>
    </section>
    <section id="testimonials_section">
        <h1 class="title">Testimonials</h1>
        <div class="carousel">
            <img src="./assets/svg/left.svg" id="left-arr" alt="Left arrow">
            <div class="testimony">
                <img src="njeriredCartoon.png" alt="" class="testimony-image">
                <div class="testimony-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa odio, minus aliquam voluptatum perferendis earum.
                </div>
            </div>
            <div class="testimony">
                <img src="mjInnocent.png" class="testimony-image" alt="testimonia">
                <div class="testimony-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa odio, minus aliquam voluptatum perferendis earum.
                </div>
            </div>
            <div class="testimony">
                <img src="name.png" alt="" class="testimony-image">
                <div class="testimony-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa odio, minus aliquam voluptatum perferendis earum.
                </div>
            </div>
            <img src="./assets/svg/right.svg" id="right-arr" alt="Right arrow">
        </div>
    </section>
</div>

<script src="./assets/js/slider.js"></script>
<style>







</style>
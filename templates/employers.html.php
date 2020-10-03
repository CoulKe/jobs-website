<div class="container candidates-page">
    <aside>
        <form action="" method="post">
            <label for="Skills search">Skills search:</label> <br>
            <input type="text" name="skills_search" placeholder="type keywords"> <br>
            <label for="Rate">Rate per hour (USD):</label> <br>
            <input type="text" name="rate_search" placeholder="search rate"> <br>
            <input type="submit" value="Search">
        </form>
    </aside>
    <section class="candidates-section">
        <h1 class="title">Employer</h1>
        <?php while ($employer = $result->fetch()) : ?>
            <div class="candidate">
                <?php
                if (empty($employer['profile_url'])) {
                    echo '<img src="./user_images/default.png" 
                    alt="$employer[\'first_name\']" class="candidate_image">';
                }
                ?>
                <div class="candidate_details">
                    <div class="candidate_name">Name: <?= $employer['first_name'] ?></div>
                    <div class="candidate_rate">Rate per hour: <?= $employer['rate'] == 0 ? 'Negotiable' : $employer['rate'] ?></div>
                    <div class="candidate_skills"> Skills: <?= $employer['skills'] == '' ? 'Not listed' : $employer['skills'] ?> </div>
                    <a href="profile?username=<?= $employer['username'] ?>">View profile</a>
                </div>
            </div>
        <?php endwhile; ?>
        <div class="pagination">
            <?= 'Pages ' . $links; ?>
        </div>
    </section>
</div>
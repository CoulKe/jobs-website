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
        <h1 class="title"><?=ucfirst($user)?></h1>
        <?php while ($user = $result->fetch()): ?>
            <div class="candidate">
                <?php
                if (empty($user['profile_url'])) {
                    echo '<img src="../assets/user_images/default.png" 
                    alt="$user[\'first_name\']" class="candidate_image">';
                }
                ?>
                <div class="candidate_details">
                    <div class="candidate_name">Name: <?= $user['first_name'] ?></div>
                    <div class="candidate_rate">Rate per hour: <?= $user['rate'] == 0 ? 'Negotiable' : $user['rate'] ?></div>
                    <div class="candidate_skills"> Skills: <?= $user['skills'] == '' ? 'Not listed' : $user['skills'] ?> </div>
                    <a href="">View profile</a>
                </div>
            </div>
        <?php endwhile;?>
        <div class="pagination">
        <?='Pages '.$links; ?>
        </div>
    </section>
</div>
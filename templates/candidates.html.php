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
        <h1 class="title">Candidates</h1>
        <?php while ($candidate = $result->fetch()): ?>
            <div class="candidate">
                <?php
                if (empty($candidate['profile_url'])) {
                    echo '<img src="../assets/user_images/default.png" 
                    alt="$candidate[\'first_name\']" class="candidate_image">';
                }
                ?>
                <div class="candidate_details">
                    <div class="candidate_name">Name: <?= $candidate['first_name'] ?></div>
                    <div class="candidate_rate">Rate per hour: <?= $candidate['rate'] == 0 ? 'Negotiable' : $candidate['rate'] ?></div>
                    <div class="candidate_skills"> Skills: <?= $candidate['skills'] == '' ? 'Not listed' : $candidate['skills'] ?> </div>
                    <a href="profile.php?username=<?=$candidate['username']?>">View profile</a>
                </div>
            </div>
        <?php endwhile;?>
        <div class="pagination">
        <?='Pages '.$links; ?>
        </div>
    </section>
</div>
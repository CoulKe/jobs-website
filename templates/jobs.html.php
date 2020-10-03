<?php foreach($jobs_array as $job):?>
<div class="job_card">
<p class="company_name"><b><a href=<?="profile?username=".$job['username']?>>
Company:</a></b><?=$job['company']?></p>
<p class="job_description"><b>Description:</b><?=$job['description']?></p>
</div>
<?php endforeach;?>
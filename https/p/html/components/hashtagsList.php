<?php function hashtagsList ($news) { ?>
  <div class="sidebar">
		<div class="sdbr">
			<div class="sdbr-a">
				<li class="sdbr-a-a">Hashtags</li>
			</div>
			<ul class="sdbr-b">
				<?php foreach ($news as $new) { ?>
					<a href="<?= _UR_ ?>news/feed/?nid=<?= $new->id ?>&ref_type=non-RF" class="sdbr-b-a">
						<li class="sdbr-b-a-a">
							<span class="sdbr-b-a-a-a">
								<?= base64_decode($new->summary) ?>
							</span>
						</li>
					</a>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php } ?>

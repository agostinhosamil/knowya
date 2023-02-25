<div class="sidebar">
  <div class="sdbr">
    <div class="sdbr-a">
      <li class="sdbr-a-a">Hashtags</li>
    </div>
    <ul class="sdbr-b">
      <?php foreach (range(1, 8) as $id) { ?>
        <a href="<?= _UR_ ?>news/feed/?id=<?= $id // $new->id ?>&ref_type=non-RF" class="sdbr-b-a">
          <li class="sdbr-b-a-a">
            <span class="sdbr-b-a-a-a">
              <?= '#playForAmerica' // $hashtag->text ?>
            </span>
          </li>
        </a>
      <?php } ?>
    </ul>
  </div>
</div>

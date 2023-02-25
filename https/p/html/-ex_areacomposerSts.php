<?php 

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("ERROR...");

	include_once (dirname(dirname(__FILE__))."/php/-ex_composerVD.php");
?>

<form method="post" class="-cmpsr" action="<?php echo $_SERVER["REQUEST_URI"];?>" enctype="multipart/form-data">
	<div id="cmpsr" class="cmpsr">
		<div class="cmpsr-a">
			<ul class="cmpsr-a-a">
				<li class="cmpsr-a-a-a">
					<label class="cmpsr-a-a-a-a" for="imgs" style="position:relative">
						<input type="file" name="imgs[]" class="composer-images-field" id="imgs" multiple="true" accept="image/jpeg,image/png">
						<span>Anexar foto/s</span>
					</label>
				</li>
				<li class="cmpsr-a-a-a">
					<label class="cmpsr-a-a-a-a" for="source">
						<input type="file" name="source" id="source" accept="video/*">
						<span>Anexar v&#xed;deo</span>
					</label>
				</li>

			</ul>
		</div>
		<div class="cmpsr-b">
			<div class="cmpsr-b-a">
				<textarea name="X-msg" class="cmpsr-b-a-a" id="X-msg"><?php echo (isset($_POST["X-msg"]) && !isset($_POST["success"])) ? $_POST["X-msg"] : "";?></textarea>
			</div>
      <div class="cmpsr-b-b">
        <?php for($i = 0; $i < 30; $i++ ): ?>
        <!-- <div class="cmpsr-b-b-a">
          <img src="" />
        </div> -->
        <?php endfor; ?>
      </div>
		</div>
		<div class="cmpsr-c">
			<div class="cmpsr-c-a">
				<input name="X-Composer" value="Publicar" type="submit" class="cmpsr-c-a-a">
			</div>
		</div>


	</div>
</form>
<div class="closeButtonContainer">
  <button>X</button>
</div>

<div class="areaComposerGradient">
  <!--div class="photo-viewer-container">
    <div class="photo-viewer-body">
      <div class="photo-viewer-control photo-viewer-control-left">
        <svg height="40px" width="40px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 34.075 34.075" xml:space="preserve" fill="#ffffff" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.6815000000000001"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path style="fill:#ffffff;" d="M24.57,34.075c-0.505,0-1.011-0.191-1.396-0.577L8.11,18.432c-0.771-0.771-0.771-2.019,0-2.79 L23.174,0.578c0.771-0.771,2.02-0.771,2.791,0s0.771,2.02,0,2.79l-13.67,13.669l13.67,13.669c0.771,0.771,0.771,2.021,0,2.792 C25.58,33.883,25.075,34.075,24.57,34.075z"></path> </g> </g> </g></svg>
      </div>
      <div class="photo-viewer-control photo-viewer-control-right">
        <svg height="40px" width="40px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 34.075 34.075" xml:space="preserve" fill="#ffffff" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.6815000000000001"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path style="fill:#ffffff;" d="M24.57,34.075c-0.505,0-1.011-0.191-1.396-0.577L8.11,18.432c-0.771-0.771-0.771-2.019,0-2.79 L23.174,0.578c0.771-0.771,2.02-0.771,2.791,0s0.771,2.02,0,2.79l-13.67,13.669l13.67,13.669c0.771,0.771,0.771,2.021,0,2.792 C25.58,33.883,25.075,34.075,24.57,34.075z"></path> </g> </g> </g></svg>
      </div>
      <div class="photo-viewer-content">
        <div>
          <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=450&height=450&ref=non-XU&refid=U" alt="photo" />
        </div>
      </div>
    </div>
    <div class="photo-viewer-footer">
      <ul class="photo-viewer-list">
        <li class="photo-viewer-list-item">
          <div>
            <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
          </div>
        </li>
        <li class="photo-viewer-list-item">
          <div>
            <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
          </div>
        </li>
        <li class="photo-viewer-list-item">
          <div>
            <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
          </div>
        </li>
        <li class="photo-viewer-list-item">
          <div>
            <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
          </div>
        </li>
        <li class="photo-viewer-list-item">
          <div>
            <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
          </div>
        </li>
      </ul>
    </div>
  </div-->
</div>

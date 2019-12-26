                  <div class="tags-block" style="<?php if($category ==2 || $category ==3){echo "display:none;";}?>">
                  <?php
                      require("api/getTags.php");
                      foreach ($tags as $key => $tag) {
                  ?>
                  
                      <span class="btn  alt  tag-button food-tag-button">
                      <?php 
                        translateTagbyId($tag['tagCategory'],$titleArray);   
                      ?>
                      </span>
                    <?php
                      }
                      ?>
                  </div>
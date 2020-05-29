
<br><br>
<br><br>


<footer >
    <div class="container-fluid">
        <center>
            <p>
                All terms belong to <a class="link" href="#">Simuratli</a> company
            </p>
            <br>
            <div class="row">
                <div class="col-md-3"><a href="<?php echo $ayarcek['ayar_facebook'] ?>"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a></div>
                <div class="col-md-3"><a href="<?php echo $ayarcek['ayar_youtube'] ?>"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a></div>
                <div class="col-md-3"><a href="<?php echo $ayarcek['ayar_google'] ?>"><i class="fa fa-reddit fa-2x" aria-hidden="true"></i></a></div>
                <div class="col-md-3"><a href="<?php echo $ayarcek['ayar_twitter'] ?>"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></div>
            </div>
            <br>
        </center>
    </div>
</footer>


</body>
<!-- New scripts-->
<script>
  new FroalaEditor('.selector', {
    // Set the image upload URL.
    imageUploadURL: 'admin/netting/islem.php'
  })
</script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="froala/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/image.min.js"></script>
  <script src="https://cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
  <script type="text/javascript" src="froala/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/video.min.js"></script>
<!-- Include Embedly plugin JS. -->

  <script>
    
    (function () {
      const editorInstance = new FroalaEditor('#edit', {
        events: {
          'image.beforeUpload': function (files) {
            const editor = this
            if (files.length) {
              var reader = new FileReader()
              reader.onload = function (e) {
                var result = e.target.result
                editor.image.insert(result, null, null, editor.image.get())
              }
              reader.readAsDataURL(files[0])
            }
            return false
          }
        }
      })
    })()
  </script>
  <!-- New scripts-->
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
<script  src="swiper/swiper.min.js" ></script>
<script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      centeredSlides: true,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
</html>
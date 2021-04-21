 <!-- ================== BEGIN BASE JS ================== -->
 <script src="<?= base_url() ?>/docs/admin/assets/js/app.min.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/js/theme/google.min.js"></script>
 <!-- ================== END BASE JS ================== -->

 <!-- ================== BEGIN PAGE LEVEL JS ================== -->
 <!-- <script src="<?= base_url() ?>/docs/admin/assets/plugins/gritter/js/jquery.gritter.js"></script> -->
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.canvaswrapper.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.colorhelpers.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.saturated.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.browser.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.drawSeries.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.uiConstants.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.time.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.resize.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.pie.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.crosshair.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.categories.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.navigate.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.touchNavigate.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.hover.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.touch.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.selection.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.symbol.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/flot/source/jquery.flot.legend.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js">
 </script>
 <script src="<?= base_url() ?>/docs/admin/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js">
 </script>
 <script src="<?= base_url() ?>/docs/admin/assets/js/demo/dashboard.js"></script>


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-messaging.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
    apiKey: "AIzaSyDJLk4hIxHXnwGdcu16MHkL35sdNQZlNY8",
    authDomain: "smartapps-bc2b0.firebaseapp.com",
    projectId: "smartapps-bc2b0",
    storageBucket: "smartapps-bc2b0.appspot.com",
    messagingSenderId: "1066632093588",
    appId: "1:1066632093588:web:da9ca38719fed63a8e3981",
    measurementId: "G-3BENPWQHLV"
  };
  // Initialize Firebase
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
messaging.getToken({
    vapidKey : 'BFaIvmTp2g0R2wL-IBLf7XzvDAbvm4Ax4vra4t5ONIha0b_h5kZcDgIfmpzrONCCp7mCP-5kFAJETxAHcwxNQiI'
}).then((token) => {
    // console.log('getToken : ', token)
    $('#token').val(data_token);
});



messaging.onMessage((data) => {
    console.log('Message received. ', data)

    // total pemberitahuan
    let count = localStorage.getItem("notification-count")
    if (count) {
    	localStorage.setItem("notification-count", parseInt(count) + 1)
    } else {
    	localStorage.setItem("notification-count", 1)
    }

    $('.total-pemberitahuan').text(localStorage.getItem("notification-count"))
    let title = data['data']['title']
    let body = data['data']['body']
    $('#notification-container').append(
        '<a href="javascript:;" class="dropdown-item media"><div class="media-left"><i class="fa fa-plus media-object bg-silver-darker"></i></div><div class="media-body"><h6 class="media-heading">'+ title + '</h6><div class="text-muted f-s-12"> ' + body + '</div></div></a>'
    )

    Notification.requestPermission((status) => {
        console.log('requestPermission', status)
        if(status == 'granted') {
            new Notification(title, {
                body:body
            })
        }
    });
});
</script>
 <!-- ================== END PAGE LEVEL JS ================== -->
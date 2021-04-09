importScripts('https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.1/firebase-messaging.js');


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
    console.log('getToken : ', token)
});

Notification.requestPermission((status) => {
	console.log('requestPermission', status)
})

messaging.onBackgroundMessage((payload) => {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
});


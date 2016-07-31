$(document).ready(function () {
    // Smart Wizard     
    $('#wizard').smartWizard({
    	labelFinish:'Register',
    	transitionEffect: 'fade'
    });

    function onFinishCallback() {
        $('#wizard').smartWizard('showMessage', 'Finish Clicked');
        //alert('Finish Clicked');
    }
});
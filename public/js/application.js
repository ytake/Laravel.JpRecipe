$(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.modal-trigger').leanModal();
	hljs.configure({
		tabReplace: '    ', // 4 spaces
		languages: {
			'php': "language-php",
			'js': "language-js",
			'bash': "language-bash"
		}
	});
	hljs.initHighlightingOnLoad();
});
$(document).ready(function(){
	hljs.configure({
		tabReplace: '    ', // 4 spaces
		languages: {
			'php': "language-php",
			'js': "language-js",
			'bash': "language-bash",
            'text': "language-text"
		}
	});
	hljs.initHighlightingOnLoad();
});
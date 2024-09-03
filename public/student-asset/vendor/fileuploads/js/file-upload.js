$('.dropify').dropify({
	messages: {
		'default': 'Drag and drop your photos here',
		'replace': 'Drag and drop or click to replace',
		'remove': 'Remove',
		'error': 'Ooops, something wrong appended.'
	},
	error: {
		'fileSize': 'The file size is too big (2M max).'
	},
	tpl: {
        message:         '<div class="dropify-message"><span class="file-icon" /> <p style="font-size: 18px!important; color: #000000; opacity: 0.7;"><b>{{ default }}</b></p><small style="font-size: 14px">Choose at least 5 photos</small><br> <span style="border-bottom: 1px solid; font-size: 14px; color: #000; margin-bottom: 5px;opacity: 0.7;">Upload from device</span></div>',
       
    }
});
	

$('.dropify').dropify({
	messages: {
		'default': 'Upload cover image (19:16)',
		'replace': 'Drag and drop or click to replace',
		'remove': 'Remove',
		'error': 'Ooops, something wrong appended.'
	},
	error: {
		'fileSize': 'The file size is too big (2M max).'
	},
	tpl: {
        message: `<div class="dropify-message course">
					<div> 
						<img src="asset/img/gallery-add.png" />
					</div>
					<div>
						<p style="font-size: 16px!important; color: #000000; opacity: 0.7;"><b>{{ default }}</b></p> 
						<span style="font-size: 16px; color: #000;opacity: 0.7;">Drop your file here or browse</span>
					</div>
			   </div>`,
       
    }
});
	

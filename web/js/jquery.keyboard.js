jQuery.noConflict();jQuery(function(){

	jQuery('#keyboard li').click(function(){
		shift = false,
		capslock = false;
		var $this = jQuery(this),
			character = $this.html(); // If it's a lowercase letter, nothing happens to this variable

		// Shift keys
		if ($this.hasClass('left-shift') || $this.hasClass('right-shift')) {
			jQuery('.letter').toggleClass('uppercase');
			jQuery('.symbol span').toggle();

			shift = (shift === true) ? false : true;
			capslock = false;
			return false;
		}

		// Caps lock
		if ($this.hasClass('capslock')) {
			jQuery('.letter').toggleClass('uppercase');
			capslock = true;
			return false;
		}

		// Delete
		if ($this.hasClass('delete')) {
			var html = $write.html();

			$write.html(html.substr(0, html.length - 1));
			return false;
		}

		// Special characters
		if ($this.hasClass('symbol')) character = jQuery('span:visible', $this).html();
		if ($this.hasClass('space')) character = ' ';
		if ($this.hasClass('tab')) character = "\t";
		if ($this.hasClass('return')) character = "\n";

		// Uppercase letter
		if ($this.hasClass('uppercase')) character = character.toUpperCase();

		// Remove shift once a key is clicked.
		if (shift === true) {
			jQuery('.symbol span').toggle();
			if (capslock === false) jQuery('.letter').toggleClass('uppercase');

			shift = false;
		}

		// Add the character
                jQuery('search_keywords').html(jQuery('search_keywords').html() + character);
	});
});


//<!--
//<!--
/*Faire fonctionner le lecteur audio*/
function playsong() {
	$('#lecteuraudio').trigger('play');
	$('#audiocommand_play').css('display', 'none');
	$('#audiocommand_pause').css('display', 'inline-block');
	$('#lectureEnCours').html($('#current_song').text());
}

/*Mettre le lecteur audio sur pause*/
function pausesong() {
	$('#lecteuraudio').trigger('pause');
	$('#audiocommand_pause').css('display', 'none');
	$('#audiocommand_play').css('display', 'inline-block');
}

/*Mettre la chanson du lecteur audio en repeat*/
function loopsongstart() {
	$('#lecteuraudio').attr('loop', 'loop');
	$('#audiocommand_loopstart').css('display', 'none');
	$('#audiocommand_loopstop').css('display', 'inline-block');
}

/*Enlever le repeat de la chanson du lecteur*/
function loopsongstop() {
	$('#lecteuraudio').removeAttr('loop');
	$('#audiocommand_loopstop').css('display', 'none');
	$('#audiocommand_loopstart').css('display', 'inline-block');
}

/*Passer à la chanson suivante*/
function nextsong() {
	var src_music;
	var name_music;
	var next_song;
	var lecteur = $('#lecteuraudio');
	next_song = $('#current_song').parent().next().find('.music_song:first');
	if (next_song.length != 1) {
		next_song = $('.music_song:eq(0)');
	}
	$('#current_song').removeAttr('id');
	$('#current_songline').removeAttr('id');
	next_song.attr('id', 'current_song');
	next_song.parent().attr('id', 'current_songline');
	src_music = next_song.attr('data-music-src');
	lecteur.attr('src', src_music);
	lecteur.attr('autoplay', 'autoplay');
	lecteur.load();
	$('#audiocommand_time').attr('max', $('#lecteuraudio')[0].duration);
}

/*Changer de musique au click + Barre de temps*/
$(function () {
	var lecteur = $('#lecteuraudio');
	var src_music;
	var next_song;

	/*Changer de musique au click*/
	$('.music_song').click(function () {
		src_music = $(this).attr('data-music-src');
		$('#current_song').removeAttr('id');
		$('#current_songline').removeAttr('id');
		$(this).attr('id', 'current_song');
		$(this).parent().attr('id', 'current_songline');
		lecteur.attr('src', src_music);
		lecteur.attr('autoplay', 'autoplay');
		$('#audiocommand_play').css('display', 'none');
		$('#audiocommand_pause').css('display', 'inline-block');
		$('#lectureEnCours').text($('#current_song').text());
		lecteur.load();
		$('#audiocommand_time').attr('max', $('#lecteuraudio')[0].duration);
	});


	/*Mettre le volume à la valeur choisie*/
	$('#lecteuraudio')[0].volume = $('#audiocommand_volume').val() / 10;

	/*Changer le volume*/
	$('#audiocommand_volume').on('change', function () {
		$('#lecteuraudio')[0].volume = $('#audiocommand_volume').val() / 10;
	});

	/*Au changement de volume - changement icône*/
	$('#lecteuraudio').on('volumechange', function () {
		if ($('#lecteuraudio')[0].volume * 10 > 7) {
			$('#audiocommand_volume_full').css('display', 'inline-block');
			$('#audiocommand_volume_middle').css('display', 'none');
			$('#audiocommand_volume_low').css('display', 'none');
			$('#audiocommand_volume_off').css('display', 'none');
		}
		else if ($('#lecteuraudio')[0].volume * 10 > 3) {
			$('#audiocommand_volume_full').css('display', 'none');
			$('#audiocommand_volume_middle').css('display', 'inline-block');
			$('#audiocommand_volume_low').css('display', 'none');
			$('#audiocommand_volume_off').css('display', 'none');
		}
		else if ($('#lecteuraudio')[0].volume * 10 > 0) {
			$('#audiocommand_volume_full').css('display', 'none');
			$('#audiocommand_volume_middle').css('display', 'none');
			$('#audiocommand_volume_low').css('display', 'inline-block');
			$('#audiocommand_volume_off').css('display', 'none');
		}
		else {
			$('#audiocommand_volume_full').css('display', 'none');
			$('#audiocommand_volume_middle').css('display', 'none');
			$('#audiocommand_volume_low').css('display', 'none');
			$('#audiocommand_volume_off').css('display', 'inline-block');
		}
	});


	/*Mettre la durée totale de la chanson sur la barre de temps*/
	$('#lecteuraudio').on('loadedmetadata', function () {
		$('#audiocommand_time').attr('max', $('#lecteuraudio')[0].duration);
	});

	/*Changer la position de la chanson quand on bouge le pointeur de la ligne de temps*/
	$('#audiocommand_time').on('change', function () {
		$('#lecteuraudio')[0].currentTime = $('#audiocommand_time').val();
		$('#audiocommand_time').attr('max', $('#lecteuraudio')[0].duration);
	});

	/*Faire avancer la barre de temps*/
	$('#lecteuraudio').on('timeupdate', function () {
		var curtime = parseInt($('#lecteuraudio')[0].currentTime, 10);
		$('#audiocommand_time').val(curtime);
		$('#audio_time').html(formatTime(curtime));
		function formatTime(seconds) {
			minutes = Math.floor(seconds / 60);
			seconds = Math.floor(seconds % 60);
			seconds = (seconds >= 10) ? seconds : "0" + seconds;
			return minutes + ":" + seconds;
		}
	});

});

	  //-->
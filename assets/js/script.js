(function($) {
  const previewVideo = document.querySelector(".previewVideo");
  const btnVolume = document.querySelector(".btn-volume");
  const btnVolumeIcon = btnVolume.querySelector(".fa-volume-mute");
  const previewImage = document.querySelector(".previewImage");

  function volumeToggle() {
    previewVideo.muted = !previewVideo.muted;
    if (btnVolumeIcon.classList.contains("fa-volume-mute")) {
      btnVolumeIcon.classList.remove("fa-volume-mute");
      btnVolumeIcon.classList.add("fa-volume-up");
    } else {
      btnVolumeIcon.classList.remove("fa-volume-up");
      btnVolumeIcon.classList.add("fa-volume-mute");
    }
  }

  function previewEnded() {
    previewImage.hidden = false;
    previewVideo.hidden = true;
  }

  window.addEventListener("DOMContentLoaded", function() {
    btnVolume.addEventListener("click", function(e) {
      if (e.target.matches(".btn-volume, .btn-volume *")) {
        volumeToggle();
      }
    });
    previewVideo.addEventListener(
      "ended",
      function(e) {
        previewEnded();
      },
      false
    );
  });
})(jQuery);

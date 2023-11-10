
let season = document.getElementById('season');
if (season != null) {
    season.addEventListener('input', function () {
        $("#tempEps").html('');
        let seasons = $('#season').val();

        for (let i = 1; i <= seasons && seasons <= 10; i++) {
            $("#tempEps").append(`
        <div class="p-2">
            <label for="episode${i}" class="form-label text-white">Temporada ${i} Episodios</label>
            <input type="number" id="episode${i}" name="episode[]"
                placeholder="N° Eps." class="form-control" required max="20">
        </div>
        `);

            seasons >= 5 ? $('#tempEps').addClass('overflow-y-scroll') : $('#tempEps').removeClass('overflow-y-scroll');

        }
    });
}


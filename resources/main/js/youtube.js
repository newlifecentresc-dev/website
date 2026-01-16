$(document).ready(function () {
    $('.loading').show();
    getYoutubeById();
    showVideoModal();
});





const getYoutubeById = () => {
    const key = 'AIzaSyBkG11uAjEwQrpYDylbH0lp3Qg_-6OuDX8'
    const playlistId = 'PL7nUnnT4naxG4HJm1608MSq6---5QM8KU';
    const URL = 'https://www.googleapis.com/youtube/v3/playlistItems';

    var options = {
        part: 'snippet',
        key: key,
        maxResults: 20,
        playlistId: playlistId
    }

    if ($.cookie("youtubeCookie") != undefined) {
        GetYoutubeVideo(JSON.parse($.cookie("youtubeCookie")));
        const id = JSON.parse($.cookie("youtubeCookie")).items[0];
        GetYoutubeVideoSingle(id);
    } else {
        $.getJSON(URL, options, function (data) {
            const id = data.items[0];
            GetYoutubeVideo(data);
            $.cookie("youtubeCookie", JSON.stringify(data)); //set cookie
            GetYoutubeVideoSingle(id)
        });
    }


}


const GetYoutubeVideo = (data) => {

    $('.loading').hide();

    $.each(data.items, function (i, item) {
        var title = item.snippet.title;
        var desc = item.snippet.description.substring(0, 100);
        var videoId = item.snippet.resourceId.videoId;
        const thumbnail = item.snippet.thumbnails.high.url;
        var title1 = title.split(" - ")[0];
        var pastor = title.split(" - ")[1];
        let time = item.snippet.publishedAt;
        time = time.split("T")[0];
        const html = buildVideo(videoId, title1, pastor, desc, time, thumbnail);

        $('#getYoutubeVideo').append(html);
    });
}


const buildVideo = (videoId, title1, pastor, desc, time, thumbnail) => {
    let html = '';

    // const iframe = `<iframe width="360" height="250" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
    const iframe = `https://www.youtube.com/embed/${videoId}`;

    html += '<div class="col-sm-6 col-md-4">';
    html += '<div class="sermon-item">';
    html += '<div class="si-thumb set-bg">';
    html += `<a href="${iframe}" target="_blank" ><img class="youtube-box" src="${thumbnail}" alt="" /></a>`;
    html += '</div>';
    html += '<div class="si-content">';
    // html += `<h4>${title1}</h4>`;
    // html += '<ul class="sermon-info">';


    // html += `<li><span>On ${time} </span></li>`;
    // html += '</ul>';

    // html += `<a href="${iframe}" target="_blank" class="site-btn sb-wide sb-line subbtn">watch video</a>`;

    html += '</div>';
    html += '</div>';
    html += '</div>';

    return html;
}

// const buildVideo = (videoId, title1, pastor, desc, time) => {
//     let html = '';

//     const iframe = `<iframe width="360" height="250" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;

//     html += '<div class="col-sm-6 col-md-4">';
//     html += '<div class="sermon-item">';
//     html += '<div class="si-thumb set-bg">';
//     html += `<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5URTp8I_kgOglIsa1NxUdpCenD_osiTGzQA&usqp=CAU" alt="" />`;
//     html += '</div>';
//     html += '<div class="si-content">';
//     html += `<h4>${title1}</h4>`;
//     html += '<ul class="sermon-info">';
//     html += `<li>Sermon From: <span> ${pastor ? pastor : '-'} </span></li>`;
//     html += '<li>Categories: <span>Sermon</span></li>';
//     html += `<li><span>On ${time} </span></li>`;
//     html += '</ul>';

//     html += '<a href="booking-reading" class="site-btn sb-wide sb-line subbtn">booking reading</a>';

//     html += '</div>';
//     html += '</div>';
//     html += '</div>';

//     return html;
// }

const GetYoutubeVideoSingle = (id) => {
    const thumb = id.snippet.thumbnails.high.url;
    const videoId = id.snippet.resourceId.videoId;
    let title = id.snippet.title;
    const title1 = title.split(" - ")[0];
    const pastor = title.split(" - ")[1];
    const desc = id.snippet.description.substring(0, 100);
    let time = id.snippet.publishedAt;
    time = time.split("T")[0];
    let html = `<img src="${thumb}" data-id="${videoId}" data-target="#myModal" class="video-thumb float-right img-thumbnail">`;
    $('#video-thumb').html(html);

    let html1 = `<div class="col-sm-9 col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="sermon-content">
                    <h2>${title1}</h2>
                    <ul class="sermon-info">
                        <li>Sermon From: <span>${pastor}</span></li>
                        <li>Categories: <span>Teaching</span></li>
                        <li>Date: <span>${time}</span></li>
                    </ul>
                    <p>${desc}</p>
                    <div class="d-none icon-links">
                        <a href=""><i class="ti-link"></i></a>
                        <a href=""><i class="ti-zip"></i></a>
                        <a href=""><i class="ti-headphone"></i></a>
                        <a href=""><i class="ti-import"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>`;

    $('#video-thumb-body').append(html1);
}

const showVideoModal = () => {
    $(document).on('click', '.video-thumb', function () {
        const modalName = $(this).attr('data-target');
        const id = $(this).attr('data-id');

        const html = `<iframe width="560" height="315" src="https://www.youtube.com/embed/${id}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
        const htmlClose = `<button type="button" data-target="${modalName}" class="btn btn-danger close-video">Close</button>`;
        $(modalName).modal('show');
        $(modalName).find('#video-frame').append(html);
        $(modalName).find('#close-button').append(htmlClose);
    })

    $(document).on('click', '.close-video', function () {
        const modalName = $(this).attr('data-target');
        $(modalName).find('#video-frame').empty();
        $(modalName).find('#close-button').empty();
        $(modalName).modal('hide');
    })
}
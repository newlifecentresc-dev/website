import React from "react"

function YoutubeItem(props) {
    const youtubeLink = `https://www.youtube.com/embed/${props.youtubeFrameId}`;
    return (
        <div className="col-sm-3">
            <div className="text-center mb-3">
                <a href={youtubeLink} target="_blank" >
                    <img className="youtube-box mb-2" src={props.youtubeThumbnail} alt="" />
                </a>
                <h5>{props.youtubeName}</h5>
            </div>
        </div >
    )
}

export default YoutubeItem
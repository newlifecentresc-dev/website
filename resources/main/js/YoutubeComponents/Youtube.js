import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import YoutubeItem from './YoutubeItem';
import YoutubeAPI from './YoutubeAPI';

class Youtube extends Component {
    constructor() {
        super()
        this.state = {
            sermons: []
        }
    }

    async componentDidMount() {
        const sermonPlaylist = await YoutubeAPI.get('/playlistItems', {
            params: {
                part: 'snippet',
                key: 'AIzaSyBkG11uAjEwQrpYDylbH0lp3Qg_-6OuDX8',
                maxResults: 20,
                playlistId: 'PL7nUnnT4naxFoLzS8EEc97piRU0x0SczS',
            }
        });

        this.setState({
            sermons: {
                teachings: sermonPlaylist.data.items,
            }
        })
    }

    render() {
        const teachingsPlaylist = this.state.sermons.teachings;
        let listPreachOptionPlaylist = '';

        if (teachingsPlaylist != undefined) {
            listPreachOptionPlaylist = teachingsPlaylist.map(playlist =>
                <YoutubeItem
                    key={playlist.snippet.resourceId.videoId}
                    youtubeName={playlist.snippet.title}
                    youtubeId={playlist.snippet.resourceId.videoId}
                    youtubeThumbnail={playlist.snippet.thumbnails.high.url}
                    youtubeFrameId={playlist.snippet.resourceId.videoId}
                />);
        }


        return (
            <>
                <section className="sermons-list-section spad">
                    <div className="container">
                        <div className="section-title">
                            <span>Experience God's Presence</span>
                            <h2>Latest Sermons</h2>
                        </div>
                        <div className="row">
                            {listPreachOptionPlaylist}
                        </div>
                    </div>
                </section>

            </>
        );
    }
}

export default Youtube;

if (document.getElementById('getYoutubeVideo')) {
    ReactDOM.render(<Youtube />, document.getElementById('getYoutubeVideo'));
}

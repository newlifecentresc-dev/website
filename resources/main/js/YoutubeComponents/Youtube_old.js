import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import YoutubeItem from './YoutubeItem';
import YoutubeAPI from './YoutubeAPI';

class Youtube extends Component {
    constructor() {
        super()
        this.state = {
            persons: []
        }
    }

    async componentDidMount() {

        // const getPlaylist1 = await YoutubeAPI.get('/playlistItems', {
        //     params: {
        //         part: 'snippet',
        //         key: 'AIzaSyBkG11uAjEwQrpYDylbH0lp3Qg_-6OuDX8',
        //         maxResults: 20,
        //         playlistId: 'PL7nUnnT4naxFrNwiMhPgLUq2eu3Jkm0BJ'
        //     }
        // });

        // const getPlaylist2 = await YoutubeAPI.get('/playlistItems', {
        //     params: {
        //         part: 'snippet',
        //         key: 'AIzaSyBkG11uAjEwQrpYDylbH0lp3Qg_-6OuDX8',
        //         maxResults: 20,
        //         playlistId: 'PL7nUnnT4naxG4HJm1608MSq6---5QM8KU',
        //     }
        // });

         const getPlaylist2 = await YoutubeAPI.get('/playlistItems', {
            params: {
                part: 'snippet',
                key: 'AIzaSyBkG11uAjEwQrpYDylbH0lp3Qg_-6OuDX8',
                maxResults: 20,
                playlistId: 'PL7nUnnT4naxFrNwiMhPgLUq2eu3Jkm0BJ',
            }
        });

        this.setState({
            persons: {
                name: getPlaylist1.data.items,
                age: getPlaylist2.data.items,
            }
        })
    }

    render() {
        const sundayServicePlaylist = this.state.persons.name;
        const preachingOptionPlaylist = this.state.persons.age;
        let listSundayServicePlaylist = '';
        let listPreachOptionPlaylist = '';


        if (sundayServicePlaylist != undefined) {
            listSundayServicePlaylist = sundayServicePlaylist.map(playlist =>
                <YoutubeItem
                    key={playlist.snippet.resourceId.videoId}
                    youtubeName={playlist.snippet.title}
                    youtubeId={playlist.snippet.resourceId.videoId}
                    youtubeThumbnail={playlist.snippet.thumbnails.high.url}
                    youtubeFrameId={playlist.snippet.resourceId.videoId}
                />);
        }

        if (preachingOptionPlaylist != undefined) {
            listPreachOptionPlaylist = preachingOptionPlaylist.map(playlist =>
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
                {/* <section className="sermons-list-section spad">
                    <div className="container">
                        <div className="section-title">
                            <span>Experience God's Presence</span>
                            <h2>Latest Sunday Sermons</h2>
                        </div>
                        <div className="row">
                            {listSundayServicePlaylist}
                        </div>
                    </div>
                </section> */}

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

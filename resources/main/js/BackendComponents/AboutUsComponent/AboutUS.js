import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import AboutUsAPI from './AboutUsAPI';
import AboutUsForm from './AboutUsForm';

class AboutUs extends Component {
    constructor() {
        super()
        this.state = {
            aboutus: '',
            red: ''
        }
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleEditorChange = this.handleEditorChange.bind(this);
    }

    handleEditorChange(event, editor) {
        const data = editor.getData();
        this.setState({ red: data, init: 0})
    }


    handleSubmit(event) {
        alert('An essay was submitted: ' + this.state.aboutus + '-  ' + this.state.red);
        event.preventDefault();
    }


    async componentDidMount() {
        const getPlaylist1 = await AboutUsAPI.get('/test');
        this.setState({ aboutus: getPlaylist1.data.aboutUsMain , init:1})
    }

    render() {
        return (
            <>
                {/* <form onSubmit={this.handleSubmit}>
                    <AboutUsForm
                        data={this.state.aboutus}
                        handleChange={this.handleEditorChange}
                    />
                </form>
                 */}
                {this.state.init ? <AboutUsForm info={this.state.aboutus} /> : <div>loading...</div>}
              
            </>
        );
    }
}

export default AboutUs;

if (document.getElementById('getAboutUsInformation')) {
    ReactDOM.render(<AboutUs />, document.getElementById('getAboutUsInformation'));
}

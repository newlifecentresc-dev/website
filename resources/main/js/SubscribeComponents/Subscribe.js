import Axios from 'axios';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Subscribe extends Component {
    constructor() {
        super()
        this.state = {
            value: '',
            success: false
        }
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleSubmit(e) {
        e.preventDefault();
        this.postData();
    }

    postData() {
        Axios.post('api/newsletter', {
            email: this.state.value
        }).then(response => {
            if (response.data.success === 'red') {
                this.setState({success: true});
            }
        });

        this.setState({value: ''});
    }

    renderForm() {
        return (
            <form onSubmit={ this.handleSubmit } className="newsletter-form">
                <input
                    type="email"
                    value={this.state.value} onChange={this.handleChange}
                    placeholder="Enter your email"
                />
                <button type="submit" className="nl-send-btn">subscribe</button>
            </form>
        )
    }

    renderAlert() {
        return (
            <div className="alert alert-success">
                <strong>Thank you!</strong> You have successfully subscribe to our newsletter.
            </div>
        )
    }

    handleChange(event) {
        this.setState({value: event.target.value});
      }

    render() {
        return (
            <>
                {!this.state.success ? this.renderForm() : this.renderAlert()} 
            </>
        );
    }
}

export default Subscribe;

if (document.getElementById('subscribe-box')) {
    ReactDOM.render(<Subscribe />, document.getElementById('subscribe-box'));
}

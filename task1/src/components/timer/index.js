import React, { Component } from "react";
import "./index.css";

export default class Timer extends Component {
  constructor (props) {
    super(props)
    this.state ={ counter: this.props.initial, stopcounter: true}
  } 

  componentDidMount() {
    this.interval = setInterval(() => this._counteR(), 1000);
  }
  componentWillUnmount() {
    clearInterval(this.interval);
  }  
  
  _counteR = () => {
    if(this.state.stopcounter){
      const value = this.state.counter > 0 ? this.state.counter - 1 : this.state.counter = 0;
      this.setState({ counter: value})
    }
  }


  render() {
    return (
      <div className="mt-100 layout-column align-items-center justify-content-center">
         <div className="timer-value" data-testid="timer-value">{this.state.counter}</div>
         <button className="large" data-testid="stop-button" onClick={() => this.setState({ stopcounter: !this.state.stopcounter})}>Stop Timer</button>
      </div>
    );
  }
}



import React, { Component } from "react";
import axios from "axios";
import "./index.css";
const classNames = require('classnames');

export default class FootballMatchesData extends Component {

  constructor(props) {
    super(props);
    this.state = { selectedYear: null, totalMatches: 0, playedMatches: [] }
  }

  onClick = (year) => (e) => {
    // Code written in next line is to take care of adding active class to selected year for css purpose.
    this.setState({ selectedYear: year })
    this.fetchData(year);
  }
  

  fetchData = async (year) => {
    axios.get(`https://jsonmock.hackerrank.com/api/football_competitions?year=${year}`).then((res) => {
      this.setState({ totalMatches: res.data.total })
      this.setState({ playedMatches: res.data.data })
    });
  }


  render() {
    var years= [2011, 2012, 2013, 2014, 2015, 2016, 2017];
    return (
      <div className="layout-row">
        <div className="section-title">Select Year</div>
        <ul className="sidebar" data-testid="year-list">
          {years.map((year, i) => {
            return (
              <li className={
                classNames({
                  'sidebar-item': true,
                  'active': this.state.selectedYear === year
                })
              }
              onClick={this.onClick(year)}
              key={year}>
                <a>{year}</a>
              </li>
            )
          })}
        </ul>

        <section className="content" style={{overflowY: this.state.playedMatches.length > 0 ? 'scroll' : 'hidden' }}>

           { this.state.playedMatches.length > 0 ?
            <section>
              <div className="total-matches" data-testid="total-matches">  Total matches: {this.state.totalMatches}</div>
              <ul className="mr-20 matches styled" data-testid="match-list">
                {this.state.playedMatches.map(match =>
                  <li className="slide-up-fade-in"> Match {match.name} won by {match.winner} </li>
                )}
              </ul>
            </section>
            :
            <section><div data-testid="no-result" className="slide-up-fade-in no-result total-matches">No Matches Found</div></section>
           } 

        </section>
      </div>
    );
  }
}
import React from "react";


function Home() {
    fetch('https://randomuser.me/api/?results=100')
        .then(response => response.json())
        .then(data => this.setState({totalReactPackages: data}));

    return (
        <div>
            <h1>THIS IS THE HOME PAGE</h1>
            <h2>It is {this.state.totalReactPackages}.</h2>
        </div>
    );
}


export default Home;
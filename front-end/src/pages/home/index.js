import React from "react";


// function Home() {
//     fetch('http://127.0.0.1:8000/api/users')
//         .then(response => response.json())
//         .then(data => this.setState({users: data}));
//
//     return (
//         <div>
//             <h1>THIS IS THE HOME PAGE</h1>
//             <h2>It is {this.state.users}.</h2>
//         </div>
//     );
// }

class Home extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            totalReactPackages: []
        };
    }

    componentDidMount() {
        fetch('https://api.npms.io/v2/search?q=react')
            .then(response => response.json())
            .then(data => this.setState({ totalReactPackages: data.results }));
    }

    render() {
        const { totalReactPackages } = this.state;
        return (
            <div className="card text-center m-3">
                <h5 className="card-header">Simple GET Request</h5>
                {totalReactPackages.map((data, key) => {
                    return (
                        <div key={key}>
                            {data.score.final +
                            " , " +
                            data.score.final +
                            " ," +
                            data.searchScore}
                        </div>
                    );
                })}
            </div>
        );
    }
}

export default Home;
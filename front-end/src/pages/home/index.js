import React from "react";

class Home extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            totalReactPackages: []
        };
    }

    componentDidMount() {
        fetch('http://127.0.0.1:8000/api/users')
            .then(response => response.json())
            .then(data => this.setState({ totalReactPackages: data }));
    }

    render() {
        const { totalReactPackages } = this.state;
        return (
            <div className="card text-center m-3">
                <h5 className="card-header">Users:</h5>
                {totalReactPackages.map((data, key) => {
                    return (
                        <div key={key}>
                            {data.first_name +
                            ", " +
                            data.last_name +
                            ", " +
                            data.email}
                        </div>
                    );
                })}
            </div>
        );
    }
}

export default Home;
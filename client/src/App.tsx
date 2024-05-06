import { React, useState, useEffect } from "react";

function App() {
    const url = "http://nginx/api/codes";
    const [data, setData] = useState([]);

    const fetchInfo = () => {
        return fetch(url)
            .then((res) => res.json())
            .then((d) => setData(d))
    }

    useEffect(() => {
        fetchInfo();
    }, []);

    return (
        <div className="App">
            <h1 style={{ color: "green" }}>Using JavaScript inbuilt FETCH API</h1>
            <center>
                {data.map((dataObj, index) => {
                    return (
                        <div
                            key={index} // Add a unique key for each element in the array
                            style={{
                                width: "15em",
                                backgroundColor: "#35D841",
                                padding: 2,
                                borderRadius: 10,
                                marginBlock: 10,
                            }}
                        >
                            <p style={{ fontSize: 20, color: 'white' }}>{dataObj.name}</p>
                        </div>
                    );
                })}
            </center>
        </div>
    );
}

export default App;
import { useState, useEffect } from 'react';
import "./App.css";

const App = () => {
    const [id, setId] = useState(null);
    const [code, setCode] = useState('');
    const [loading, setLoading] = useState(false);
    const [dataFetched, setDataFetched] = useState(false);
    const [error, setError] = useState<Error | null>(null);

    const sendPostRequest = async () => {
        try {
            setLoading(true);
            const response = await fetch('http://localhost/api/codes', {
                method: 'POST',
                headers: {
                    'Accept': 'application/ld+json',
                    'Content-Type': 'application/ld+json'
                },
                body: JSON.stringify({ code: 'string' })
            });

            if (!response.ok) {
                throw new Error('Failed to send POST request');
            }

            const responseData = await response.json();
            const newId = responseData.id;
            setId(newId);
        } catch (error: any) {
            setError(new Error(`Error: ${(error as Error).message}`));
            setLoading(false);
        }
    };

    useEffect(() => {

        const fetchCode = async () => {
            try {

                if (id === null) return;
                setLoading(true);

                const response = await fetch(`http://localhost/api/codes/${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/ld+json'
                    }
                });

                if (!response.ok) {
                    throw new Error('Failed to fetch code');
                }

                const codeData = await response.json();
                console.log(codeData);
                setCode(codeData.code);
                setDataFetched(true);
                setLoading(false);
            } catch (error) {
                setError(new Error(`Error: ${(error as Error).message}`));
                setLoading(false);
            }
        };

        if (id !== null) {
            setTimeout(() => {
                fetchCode();
                setLoading(true);
            }, 1000);
        }
    }, [id]);

    return (
        <div className="background">
            <div className="content">
                <button className="button" onClick={sendPostRequest}>Execute Code</button>
                    {loading ? (
                        <p>Loading...</p>
                    ) : (
                        <>
                            {error ? (
                                <p>{error.message}</p>
                            ) : (
                                <>
                                    {dataFetched && (
                                        <p>
                                            ID: {id}
                                            <br/>
                                            Code: {code}
                                        </p>
                                    )}
                                </>
                            )}
                        </>
                    )}
            </div>
        </div>
    );
};

export default App;

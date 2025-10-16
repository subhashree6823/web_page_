import React, { useEffect, useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

export default function Dashboard() {
  const [username, setUsername] = useState("");
  const navigate = useNavigate();

  useEffect(() => {
    axios.get("C:\Users\shree\OneDrive\Desktop\web page assignment\Backend\dashboard.php")
      .then(res => {
        if(res.data.success) {
          setUsername(res.data.username);
        } else {
          navigate("/");
        }
      })
      .catch(err => console.log(err));
  }, []);

  const handleLogout = () => {
    localStorage.removeItem("username");
    navigate("/");
  };

  return (
    <div>
      <h2>Welcome, {username}</h2>
      <button onClick={handleLogout}>Logout</button>
    </div>
  );
}
import React, { useState, useEffect } from "react";
import axios from "axios";
import Shelf from "./Shelf";

const Shelives = () => {
  const [shelives, setShelives] = useState([]);

  useEffect(() => {
    axios.get("/api/shelf/all").then((response) => {
      setShelives(response.data);
    });
  }, shelives.length);

  return (
    <ul>
      {shelives.map((item) => (
        <Shelf name={item.name} key={item.id} slug={item.slug} />
      ))}
    </ul>
  );
};

export default Shelives;

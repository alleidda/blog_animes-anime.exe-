import React, { useState, useEffect } from 'react';
import TitreH1 from "../../../components/UI/Titres/TitreH1";
import axios from 'axios';
import Anime from './Anime/Anime';
import Bouton from '../../../components/UI/Bouton/Bouton';

const Application = () => {

    useEffect(() => {
        console.log("hello")
        document.title = 'Animes.exe';
      },[]);

    const [animes, setAnimes] = useState(null);
    const [filtreGenre, setFiltreGenre] = useState(null);
    const [filtreStudio, setFiltreStudio] = useState(null);
    const [studioNom, setStudioNom] = useState(null);
    const [genreNom, setGenreNom] = useState(null);
    const [listeGenres, setListeGenres] = useState(null);
    const [listeStudios, setListeStudios] = useState(null);

    useEffect(() => {
        console.log(window.location)
        const loadData = async () => {
            const genre = filtreGenre ? filtreGenre : "-1";
            const studio = filtreStudio ? filtreStudio : "-1";
            axios.get(`http://localhost/projets/blog_animes/backend/front/animes/${genre}/${studio}`)
                .then(response => {
                    console.log(response.data);
                    setAnimes(Object.values(response.data));
                })
        }


        loadData();

    }, [filtreGenre, filtreStudio])

    useEffect(() => {
        const loadGenres = async () => {
            axios.get(`http://localhost/projets/blog_animes/backend/front/genres`)
                .then(response => {
                    setListeGenres(response.data);
                })
        }
        const loadStudios = async () => {
            axios.get(`http://localhost/projets/blog_animes/backend/front/studios`)
                .then(response => {
                    setListeStudios(response.data);
                })
        }
        loadGenres();
        loadStudios();
    }, [])


    const handleResetFiltreGenre = () => {
        setFiltreGenre(null);
    }
    const handleResetFiltreStudio = () => {
        setFiltreStudio(null);
    }

    const handleSelectionGenre = (idGenre, genreNm) => {
        if(idGenre==="-1") handleResetFiltreGenre()
        else {
        setGenreNom(genreNm);
        setFiltreGenre(idGenre);
        }
    }

    const handleSelectionStudio = (idStudio, studioNm) => {
        if (idStudio === "-1") handleResetFiltreStudio()
        else {
        setStudioNom(studioNm);
        setFiltreStudio(idStudio);
        }

    }

    

    return (
        <div>
            <TitreH1 bgColor="bg-success">Page listant mes animes favoris</TitreH1>
            {
                <div className="container-fluid">
                <span>Filtres : </span>
                <select onChange={(event) => {
                    const optionText = event.target.options[event.target.selectedIndex].text;
                    handleSelectionGenre(event.target.value,optionText)}
                }>
                    <option value="-1" selected={filtreGenre===null && "selected"}>Genres</option>
                    {
                        listeGenres && listeGenres.map(genre => {
                           return <option value={genre.genre_id} key={genre.genre_id} selected={filtreGenre===genre.genre_id && "selected"}>{genre.genre_nom}</option>
                        })
                    }
                </select>
                <select onChange={(event) => {
                    const optionText = event.target.options[event.target.selectedIndex].text;
                    handleSelectionStudio(event.target.value,optionText)}
                }>
                    <option value="-1" selected={filtreStudio===null && "selected"}>Studios</option>
                    {
                        listeStudios && listeStudios.map(studio => {
                           return <option value={studio.studio_id} key={studio.studio_id} selected={filtreStudio===studio.studio_id && "selected"}>{studio.studio_nom}</option>
                        })
                    }
                </select>
                    {
                        filtreGenre && <Bouton typeBtn="btn-secondary"
                            clic={handleResetFiltreGenre}
                        >{genreNom} &nbsp; &nbsp;<i className="fas fa-times"></i></Bouton>
                    }
                    {
                        filtreStudio && <Bouton typeBtn="btn-primary"
                            clic={handleResetFiltreStudio}
                        >{studioNom} &nbsp; &nbsp;<i className="fas fa-times"></i></Bouton>
                    }
                </div>
            }

            <div className="container-fluid">
                {console.log(filtreGenre)}

                {
                    animes && animes.map(anime => {
                        return (
                            <div className=" d-inline-flex col-6" key={anime.id}>
                                <Anime {...anime} filtreGenre={handleSelectionGenre} filtreStudio={handleSelectionStudio} />
                            </div>
                        )
                    })
                }

            </div>
        </div>
    );

}

export default Application;